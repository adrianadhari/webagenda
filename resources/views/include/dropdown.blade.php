<style>
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: white;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 8px;
        padding: 10px;
        width: 150px;
    }

    .dropdown-logout {
        position: relative;
        cursor: pointer;
    }

    .dropdown-content.show {
        display: block;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropdownIcon = document.getElementById("dropdown-icon");
        const dropdownContent = document.getElementById("dropdown-content");

        dropdownIcon.addEventListener("click", function(event) {
            dropdownContent.classList.toggle("show"); // Toggle tampilan dropdown
            event.stopPropagation(); // Mencegah event klik di luar dropdown
        });

        // Tutup dropdown jika klik di luar
        document.addEventListener("click", function(event) {
            if (!dropdownContent.contains(event.target) && !dropdownIcon.contains(event.target)) {
                dropdownContent.classList.remove("show");
            }
        });
    });
</script>
