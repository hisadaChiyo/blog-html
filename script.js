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

    // メニューを閉じる（❌を押した時と同じ状態）
    const closeMenu = () => {
        btn.classList.remove('open');
        menu.classList.remove('open');
    };

    // ハンバーガー／❌のクリックで開閉
    btn.addEventListener('click', () => {
        btn.classList.toggle('open');
        menu.classList.toggle('open');
    });

    // メニュー内のリンク（Blog / Categories）をクリックしたら閉じる
    menu.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', closeMenu);
    });

    // 画面を広げたら、開いた状態をリセット
    const mq = window.matchMedia('(min-width: 741px)');
    mq.addEventListener('change', (e) => {
        if (e.matches) closeMenu();
    });

});
