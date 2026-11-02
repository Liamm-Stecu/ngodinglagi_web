<style>
    /* ===== Shell ===== */
    .admin-shell {
        min-height: 100vh;
        color: #0f172a;
        background:
            radial-gradient(900px 420px at 85% -5%, rgba(15, 118, 110, .07), transparent 60%),
            radial-gradient(700px 380px at -10% 100%, rgba(20, 184, 166, .06), transparent 55%),
            #f4f6f9;
    }

    /* ===== Sidebar ===== */
    .admin-sidebar {
        background: linear-gradient(180deg, #0b1220 0%, #0f172a 72%);
        color: #94a3b8;
    }
    .admin-side-label {
        padding: 0 .85rem;
        margin: 1.1rem 0 .35rem;
        font-size: .62rem;
        font-weight: 700;
        letter-spacing: .18em;
        text-transform: uppercase;
        color: #475569;
    }
    .admin-sidebar nav a {
        position: relative;
        display: flex;
        align-items: center;
        gap: .7rem;
        padding: .58rem .75rem;
        border-radius: .8rem;
        font-size: .9rem;
        font-weight: 500;
        color: #94a3b8;
        transition: background .18s ease, color .18s ease, transform .18s ease, box-shadow .18s ease;
    }
    .admin-sidebar nav a:hover { background: rgba(255,255,255,.06); color: #f8fafc; transform: translateX(2px); }
    .admin-sidebar nav a.active {
        background: linear-gradient(135deg, #0f766e, #14b8a6);
        color: #fff;
        box-shadow: 0 10px 22px rgba(15,118,110,.35);
    }
    .admin-sidebar nav a.active::before {
        content: "";
        position: absolute;
        left: -.75rem;
        top: 22%;
        width: 3px;
        height: 56%;
        border-radius: 999px;
        background: #5eead4;
    }
    .admin-nav-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 1.65rem;
        height: 1.65rem;
        flex-shrink: 0;
        border-radius: .5rem;
        background: rgba(255,255,255,.07);
        border: 1px solid rgba(255,255,255,.06);
    }
    .admin-sidebar nav a.active .admin-nav-icon { background: rgba(255,255,255,.2); border-color: transparent; }
    .admin-side-foot {
        margin-top: auto;
        display: flex;
        align-items: center;
        gap: .65rem;
        padding: .7rem .8rem;
        border-radius: .9rem;
        background: rgba(255,255,255,.04);
        border: 1px solid rgba(255,255,255,.06);
    }

    /* ===== Komponen ===== */
    .admin-card {
        background: #fff;
        border: 1px solid #e8ecf1;
        border-radius: 1.1rem;
        padding: 1.35rem;
        box-shadow: 0 1px 2px rgba(15,23,42,.04), 0 12px 32px -24px rgba(15,23,42,.18);
    }
    .admin-card--flush { padding: 0; }
    .admin-card--compact { padding: 1.05rem; }
    .admin-card--header { padding: 1.25rem; }
    .admin-card--tall { padding-top: 3.2rem; padding-bottom: 3.2rem; }
    @media (min-width: 640px) {
        .admin-card--compact { padding: 1.3rem; }
        .admin-card--header { padding: 1.5rem; }
    }
    .admin-eyebrow { font-size: .68rem; font-weight: 700; text-transform: uppercase; letter-spacing: .16em; color: #0f766e; }
    .admin-label { display: block; font-size: .72rem; font-weight: 600; text-transform: uppercase; letter-spacing: .07em; color: #64748b; margin-bottom: .35rem; }
    .admin-label--flush { margin-bottom: 0; }
    .admin-input {
        width: 100%;
        border: 1px solid #e2e8f0;
        border-radius: .8rem;
        background: #f8fafc;
        padding: .68rem .9rem;
        font-size: .9rem;
        color: #0f172a;
        transition: border-color .15s ease, box-shadow .15s ease, background .15s ease;
    }
    .admin-input:hover { border-color: #cbd5e1; }
    .admin-input:focus { outline: none; border-color: #0f766e; background: #fff; box-shadow: 0 0 0 3px rgba(15,118,110,.14); }
    .admin-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: .45rem;
        background: #0f766e;
        color: #fff;
        font-weight: 600;
        font-size: .875rem;
        border-radius: .85rem;
        padding: .68rem 1.15rem;
        border: 0;
        cursor: pointer;
        transition: background .15s ease, transform .15s ease, box-shadow .15s ease;
    }
    .admin-btn:hover { background: #0d9488; transform: translateY(-1px); box-shadow: 0 10px 20px -8px rgba(15,118,110,.5); }
    .admin-btn-ghost { background: #fff; color: #0f766e; border: 1px solid #ccfbf1; box-shadow: 0 1px 2px rgba(15,23,42,.04); }
    .admin-btn-ghost:hover { background: #f0fdfa; box-shadow: 0 1px 2px rgba(15,23,42,.04); }
    .admin-btn-danger { background: #fff; color: #dc2626; border: 1px solid #fecaca; }
    .admin-btn-danger:hover { background: #fef2f2; box-shadow: none; }
    .admin-btn-soft { background: #f0fdfa; color: #0f766e; border: 1px solid #ccfbf1; }
    .admin-btn-soft:hover { background: #ccfbf1; box-shadow: none; }
    .admin-btn-sm { padding: .42rem .8rem; font-size: .78rem; border-radius: .7rem; gap: .3rem; }
    .admin-error { color: #b91c1c; font-size: .8rem; background: #fef2f2; border: 1px solid #fecaca; border-radius: .75rem; padding: .65rem .85rem; }
    .admin-flash {
        display: flex;
        align-items: center;
        gap: .55rem;
        background: #ecfdf5;
        border: 1px solid #99f6e4;
        color: #0f766e;
        border-radius: .9rem;
        padding: .8rem 1rem;
        font-size: .875rem;
        font-weight: 500;
        box-shadow: 0 8px 20px -18px rgba(15,118,110,.9);
    }
    .admin-flash::before {
        content: "";
        width: .55rem;
        height: .55rem;
        border-radius: 999px;
        background: #14b8a6;
        box-shadow: 0 0 0 4px rgba(20,184,166,.18);
        flex-shrink: 0;
    }
    .admin-kpi { transition: border-color .18s ease, box-shadow .18s ease, transform .18s ease; }
    .admin-kpi:hover { border-color: #99f6e4; box-shadow: 0 18px 34px -26px rgba(15,23,42,.35); transform: translateY(-2px); }
    .admin-icon-chip {
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: .8rem;
        background: linear-gradient(135deg, #f0fdfa, #e6fffb);
        color: #0f766e;
        border: 1px solid #ccfbf1;
    }
    .admin-avatar {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 2.5rem;
        height: 2.5rem;
        flex-shrink: 0;
        border-radius: 999px;
        background: linear-gradient(135deg, #0f766e, #14b8a6);
        color: #fff;
        font-size: .9rem;
        font-weight: 700;
        text-transform: uppercase;
        box-shadow: 0 8px 16px -10px rgba(15,118,110,.8);
    }
    .admin-section-title { font-family: 'Space Grotesk', sans-serif; font-size: .95rem; font-weight: 600; color: #0f172a; letter-spacing: -.01em; }

    /* ===== Accordion admin (layanan) ===== */
    .admin-acc {
        background: #fff;
        border: 1px solid #e8ecf1;
        border-radius: 1rem;
        box-shadow: 0 1px 2px rgba(15,23,42,.04);
        transition: border-color .2s ease, box-shadow .2s ease;
    }
    .admin-acc.is-open { border-color: #99f6e4; box-shadow: 0 16px 34px -28px rgba(15,23,42,.45); }
    .admin-acc-trigger {
        display: flex;
        width: 100%;
        align-items: center;
        gap: .85rem;
        padding: .95rem 1.1rem;
        text-align: left;
        border-radius: 1rem;
        transition: background .15s ease;
        cursor: pointer;
    }
    .admin-acc-trigger:hover { background: #f8fafc; }
    .admin-acc-body { padding: 1rem 1.1rem 1.2rem; }

    /* ===== Modal edit ===== */
    .admin-modal-page {
        min-height: 100vh;
        display: flex;
        align-items: flex-start;
        justify-content: center;
        padding: 1.25rem;
        background:
            radial-gradient(1000px 480px at 50% -10%, rgba(15,118,110,.45), transparent 62%),
            radial-gradient(700px 420px at 90% 110%, rgba(20,184,166,.18), transparent 60%),
            #0b1220;
    }
    .admin-modal {
        display: flex;
        flex-direction: column;
        width: 100%;
        max-width: 46rem;
        max-height: calc(100vh - 2.5rem);
        background: #fff;
        border: 1px solid rgba(255,255,255,.1);
        border-radius: 1.35rem;
        box-shadow: 0 40px 90px -30px rgba(2,6,23,.6);
        overflow: hidden;
        animation: admin-modal-in .32s cubic-bezier(.22,1,.36,1) both;
    }
    .admin-modal-lg { max-width: 56rem; }
    .admin-modal-head {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 1rem;
        padding: 1.15rem 1.4rem;
        background: linear-gradient(180deg, #f8fafc, #fff);
        border-bottom: 1px solid #e8ecf1;
    }
    .admin-modal-title { margin-top: .25rem; font-family: 'Space Grotesk', sans-serif; font-size: 1.3rem; font-weight: 600; letter-spacing: -.02em; color: #0f172a; line-height: 1.25; }
    .admin-modal-sub { margin-top: .3rem; font-size: .84rem; color: #64748b; }
    .admin-modal-close {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 2.2rem;
        height: 2.2rem;
        flex-shrink: 0;
        border-radius: .8rem;
        border: 1px solid #e2e8f0;
        background: #fff;
        color: #64748b;
        transition: all .18s ease;
    }
    .admin-modal-close:hover { background: #fef2f2; border-color: #fecaca; color: #dc2626; transform: rotate(90deg); }
    .admin-modal-body { padding: 1.4rem; overflow-y: auto; overscroll-behavior: contain; }
    .admin-modal-foot {
        display: flex;
        flex-wrap: wrap;
        gap: .75rem;
        padding: 1rem 1.4rem;
        background: rgba(248,250,252,.92);
        backdrop-filter: blur(8px);
        border-top: 1px solid #e8ecf1;
    }
    @keyframes admin-modal-in { from { opacity: 0; transform: translateY(18px) scale(.985); } to { opacity: 1; transform: none; } }

    /* ===== Chart ===== */
    .chart-donut-circle { transition: stroke-dashoffset 1s cubic-bezier(.22,1,.36,1); }
    .chart-bar-fill { transform-origin: left center; animation: bar-grow .8s cubic-bezier(.22,1,.36,1) both; }
    @keyframes bar-grow { from { transform: scaleX(0); } to { transform: scaleX(1); } }

    @media (prefers-reduced-motion: reduce) {
        .admin-kpi, .admin-sidebar nav a, .admin-btn, .admin-input, .admin-modal, .admin-modal-close { transition: none !important; transform: none !important; animation: none !important; }
        .chart-bar-fill, .chart-donut-circle { animation: none !important; transition: none !important; }
    }
</style>
