
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
    function closeMenu() {
        btn.classList.remove('open');
        menu.classList.remove('open');
    }

    // ボタンで開閉
    btn.addEventListener('click', function () {
        const isOpen = menu.classList.contains('open');

        if (isOpen) {
            closeMenu();
        } else {
            btn.classList.add('open');
            menu.classList.add('open');
        }
    });

    // Blog・Categoriesをクリックしたら閉じる
    menu.addEventListener('click', function (event) {
        const link = event.target.closest('a');

        if (link) {
            closeMenu();
        }
    }, true);

    // PC表示に切り替えたら閉じる
    const mq = window.matchMedia('(min-width: 741px)');

    mq.addEventListener('change', function (event) {
        if (event.matches) {
            closeMenu();
        }
    });
});
