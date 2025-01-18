<div class="left-side-bar">
    <div class="brand-logo">
        <a href="#">
            
            
            <img style="width: 50px; height: 50px;"  src="https://s3-alpha-sig.figma.com/img/0397/b2c6/c54abf1072747a10cd94bb07135ef286?Expires=1735516800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=XTuWg~9sgIrm9Dvk1a53453MAial~gH5kBpOpZA39B3P~lNYIuWjd74WUSGSulmfSOO-yhcGVa2eLSr28ZKA~cLDDZ1hx81QQZRcXCYruP5ZPX9HufRMGa1v~5Zg1H388OaFSBAv8svw8gtfce822jEue1ilVM2f~C~6poglag1fbt51Kbvw4pEfSk3C9Xdcdwab1j31biMM~cJQdcra9VrumM-yz62Jwcv0c5XtJDi34CnB8g-eRd0YSNdhHf5HcH9krwCMGk5PBWmGzSoRh2IfrIvPkXe4Mg2eh--cwbysHtvkge3z3lEjHZUy2U0ednOy2jueBX1yyFBs8ckAwA__" alt=""  class="dark-logo">
            
            <img style="width: 50px; height: 50px;" src="https://s3-alpha-sig.figma.com/img/9594/6759/ef1f3eed456f4246c36d550b7f626670?Expires=1735516800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=cZ~4av9Coxr~NM6ErwQ~lJiOHHil6BaCcwvx0BdDBIINyUZXYwRLplv0P2ZS4WmFwwzKya~vEWQOvqapM5qlEpYLVTxQLaHm7SLeegNGEa7JB3s3sbiFNdQTef~fNh6IK4cYU5xuM8ZJ2dVoIRjGl7HVugUoA9BrmdZfadigsdydYPDBn1ANWqMacwqCluu5Pe8KN6zAY4O46LNFNW869VdI6sqD4RnYEseGnKz5Q2Pbf8r5FTpiKUNtHmRueRO899u3OhxrwjJWUutFLYwIfvVXQX6rRMQ-cp1ZqWUsgkT9h-eIvaZNJSWCx-4Ma8Ji7emdRcWtiKlqbw1jPjA-fA__" alt=""  class="light-logo">
            <p style="font-size: 12px;">CodeBridge</p>
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ route('/') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext" data-key="home">Home</span>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-copy"></span><span class="mtext" data-key="course">Course</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="/bahasa/list" data-key="bahasa">Bahasa</a></li>
                        <li><a href="/kategori/list" data-key="kategori">Kategori</a></li>
                        <li><a href="/kelas/list" data-key="kelas">Kelas</a></li>
                    </ul>
                </li>
            
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-invoice"></span><span class="mtext" data-key="transaksi">Transaksi</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="/transaksi/list" data-key="transaksi_user">Bahasa</a></li>
                        <li><a href="/qris/list">Qris</a></li>
                   
                    </ul>
                </li>
               

                <li>
                    <a href="{{ route('/logout') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext" data-key="logout">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Language Dropdown -->

</div>
<div class="mobile-menu-overlay"></div>

<script>
    const translations = {
        en: {
            home: "Home",
            course: "Course",
            bahasa: "Language",
            kategori: "Category",
            kelas: "Class",
            logout: "Logout",
            daftar_kelas : "Class List",
            transaksi_anda : "Your Transaction",
            kelas_anda : "Your Class",
            transaksi_user : "New Transaction",
            transaksi : "Transaction"
        },
        id: {
            home: "Beranda",
            course: "Kursus",
            bahasa: "Bahasa",
            kategori: "Kategori",
            kelas: "Kelas",
            logout: "Keluar",
            daftar_kelas : "Daftar Kelas",
            transaksi_anda : "Transaksi Anda",
            kelas_anda : "Kelas Anda",
            transaksi_user : "Transaksi Masuk",
            transaksi : "Transaksi"
        }
    };

    function changeLanguage(language) {
        const elements = document.querySelectorAll("[data-key]");
        elements.forEach(element => {
            const key = element.getAttribute("data-key");
            element.textContent = translations[language][key];
        });
    }

    // Set default language on page load
    document.addEventListener("DOMContentLoaded", () => {
        changeLanguage('id'); // Default to English
    });
</script>