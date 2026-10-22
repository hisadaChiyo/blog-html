document.addEventListener('DOMContentLoaded', function () {
    /* 見出しアニメーション（トップページのみ） */
    const text = document.querySelector('.text');
    if (text) {
        text.classList.add('is-active');
    }

    /* ハンバーガーメニュー */
    const btn = document.querySelector('.hamburger-btn');
    const menu = document.querySelector('header ul');
    if (!btn || !menu) return;


    document.addEventListener('DOMContentLoaded', function () {
        /* 見出しアニメーション */
        const text = document.querySelector('.text');

        if (text) {
            text.classList.add('is-active');
        }

        /* ハンバーガーメニュー */
        const btn = document.querySelector('.hamburger-btn');
        const menu = document.querySelector('.gnav');

        if (!btn || !menu) return;

        // メニューを閉じる
        const closeMenu = () => {
            btn.classList.remove('open');
            menu.classList.remove('open');
        };

        // ハンバーガーボタンで開閉
        btn.addEventListener('click', () => {
            btn.classList.toggle('open');
            menu.classList.toggle('open');
        });

        // Blog・Categoriesを押したら閉じる
        menu.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', closeMenu);
        });

        // PC表示に切り替わったら閉じる
        const mq = window.matchMedia('(min-width: 741px)');

        mq.addEventListener('change', (event) => {
            if (event.matches) {
                closeMenu();
            }
        });
    });

});
