<div class="container">
    <div class="main">
        <!-- Konten utama di sini -->
    </div>
    <footer class="bg-gray-800 py-4">
        <div class="container mx-auto text-center">
            <p class="text-black">&copy; {{ date('Y') }} Kominfo Kota Bogor. All rights reserved.</p>
        </div>
    </footer>
</div>

<style>
    :root {
        --primary: #78B3CE;
        --secondary: #F96E2A;
        --tertiary: #FBF8EF;
        --background: #C9E6F0;
        --white: #ffffff;
        --gray: #686868;
        --black: #000000;
    }

    html,
    body {
        height: 100%;
        margin: 0;
    }

    .container {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .main {
        flex: 1;
    }

    footer {
        background-color: var(--tertiary);
        color: var(--black);
        text-align: center;
        padding: 10px 0;
        height: 70px;
    }
</style>
