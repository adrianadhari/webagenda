document.addEventListener("DOMContentLoaded", function () {
    const monthYear = document.getElementById("month-year");
    const daysContainer = document.getElementById("days");
    const prevButton = document.getElementById("prev");
    const nextButton = document.getElementById("next");
    const agendaList = document.getElementById("agenda-list");

    const months = [
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember",
    ];

    let currentDate = new Date();
    let today = new Date();

    function getStatusColor(status) {
        switch (status.toLowerCase()) {
            case "confirmed":
                return "green";
            case "canceled":
                return "red";
            case "tentative":
                return "orange";
            case "draft":
                return "blue";
            case "reschedule":
                return "#FFD43B";
            default:
                return "gray";
        }
    }

    async function fetchAgendasByDate(date) {
        try {
            const response = await fetch(`/api/agendas/${date}`);
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            const data = await response.json();
            return data;
        } catch (error) {
            console.error("Fetch error:", error);
            return [];
        }
    }

    async function renderAgendaItems(selectedDateStr) {
        agendaList.innerHTML = "<p>Loading...</p>";

        const agendas = await fetchAgendasByDate(selectedDateStr);

        agendaList.innerHTML = "";

        if (agendas.length === 0) {
            agendaList.innerHTML = `<p>Tidak ada agenda di tanggal ini.</p>`;
            return;
        }

        agendas.forEach((item) => {
            const statusColor = getStatusColor(item.status);

            const agendaHTML = `
                <div class="agenda-item">
                    <div style="display: flex; justify-content: space-between; align-items: start;">
                        <div>
                            <p><i class="fa-solid fa-calendar-days"></i> ${new Date(
                                item.date
                            ).toLocaleDateString("id-ID", {
                                weekday: "long",
                                year: "numeric",
                                month: "long",
                                day: "numeric",
                            })}</p>
                            <p><i class="fa-solid fa-clock"></i> ${item.jam}</p>
                            <p><strong>Ket:</strong> ${item.title}</p>
                            <p><i class="fa-solid fa-location-dot"></i> ${
                                item.tempat
                            }</p>
                            <p><strong style="color: orange;">Agenda:</strong> Wali Kota</p>
                            <p><strong>Oleh:</strong> ${
                                item.author || "N/A"
                            }</p>
                        </div>
                        <div>
                            <button style="background-color: #FFD43B;" class="btn-circle"><i class="fa-solid fa-calendar-days"></i></button>
                            <button style="background-color: #4CAF50;" class="btn-circle"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button style="background-color: #f44336;" class="btn-circle"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                    <div style="text-align: right; margin-top: 10px;">
                        <span style="background-color: ${statusColor}; color: white; padding: 5px 10px; border-radius: 20px;">
                            ${item.status}
                        </span>
                    </div>
                </div>
            `;

            agendaList.innerHTML += agendaHTML;
        });
    }

    async function fetchAgendaDates(year, month) {
        try {
            const response = await fetch(
                `/api/agenda-dates?year=${year}&month=${String(
                    month + 1
                ).padStart(2, "0")}`
            );
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            const dates = await response.json();
            const datesWithAgenda = new Set();
            dates.forEach((dateStr) => {
                const day = parseInt(dateStr.split("-")[2], 10);
                datesWithAgenda.add(day);
            });
            return datesWithAgenda;
        } catch (error) {
            console.error("Fetch error:", error);
            return new Set();
        }
    }

    async function renderCalendar(date) {
        const year = date.getFullYear();
        const month = date.getMonth();

        monthYear.textContent = `${months[month]} ${year}`;
        daysContainer.innerHTML = "";

        const agendaDates = await fetchAgendaDates(year, month);

        // Get the first day of the month (0=Sunday, 6=Saturday)
        const firstDayOfMonth = new Date(year, month, 1).getDay();

        // Get the total days in the month
        const totalDaysInMonth = new Date(year, month + 1, 0).getDate();

        // Calculate the number of days to show from the previous month
        const prevMonthDaysToShow =
            firstDayOfMonth === 0 ? 6 : firstDayOfMonth - 1;

        // Get the last day of the previous month
        const lastDayOfPrevMonth = new Date(year, month, 0).getDate();

        // Add days from the previous month
        for (let i = prevMonthDaysToShow; i > 0; i--) {
            const dayDiv = document.createElement("div");
            dayDiv.textContent = lastDayOfPrevMonth - i + 1;
            dayDiv.classList.add("fade");
            daysContainer.appendChild(dayDiv);
        }

        // Add days for the current month
        for (let i = 1; i <= totalDaysInMonth; i++) {
            const dayDiv = document.createElement("div");
            dayDiv.textContent = i;

            if (agendaDates.has(i)) {
                dayDiv.classList.add("has-agenda");
            }

            // Highlight today
            if (
                i === today.getDate() &&
                month === today.getMonth() &&
                year === today.getFullYear()
            ) {
                dayDiv.classList.add("today");
            }

            // Color weekends red
            const dayOfWeek = new Date(year, month, i).getDay();
            if (dayOfWeek === 6 || dayOfWeek === 0) {
                dayDiv.classList.add("red");
            }

            dayDiv.addEventListener("click", () => {
                const dateStr = `${year}-${String(month + 1).padStart(
                    2,
                    "0"
                )}-${String(i).padStart(2, "0")}`;
                renderAgendaItems(dateStr);
            });

            daysContainer.appendChild(dayDiv);
        }

        // Calculate total number of day divs to fill the calendar grid (6 rows * 7 days = 42)
        const totalDayDivs = daysContainer.children.length;
        const daysToAdd = 42 - totalDayDivs;

        // Add days from the next month to fill the grid
        for (let i = 1; i <= daysToAdd; i++) {
            const dayDiv = document.createElement("div");
            dayDiv.textContent = i;
            dayDiv.classList.add("fade");
            daysContainer.appendChild(dayDiv);
        }
    }

    prevButton.addEventListener("click", function () {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar(currentDate);
    });

    nextButton.addEventListener("click", function () {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar(currentDate);
    });

    renderCalendar(currentDate);

    // Show agenda for today on initial load
    const todayStr = today.toISOString().split("T")[0];
    renderAgendaItems(todayStr);
});
