const text = document.querySelector('.text');

text.classList.add('is-active');
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

    const closeMenu = () => {
        btn.classList.remove('open');
        menu.classList.remove('open');
    };

    btn.addEventListener('click', () => {
        btn.classList.toggle('open');
        menu.classList.toggle('open');
    });

    menu.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', closeMenu);
    });

    const mq = window.matchMedia('(min-width: 741px)');
    mq.addEventListener('change', (e) => {
        if (e.matches) closeMenu();
    });
});
