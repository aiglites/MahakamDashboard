<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard Kanwil DJPb</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@600;700;800&family=Public+Sans:wght@400;500;600;700&display=swap">
<style>
  :root {
    --page: #f9f9f7;
    --surface: #fcfcfb;
    --ink: #0b0b0b;
    --ink-2: #52514e;
    --ink-muted: #898781;
    --hairline: #e1e0d9;
    --baseline: #c3c2b7;
    --ring: rgba(11,11,11,0.10);

    --accent: #2a78d6;
    --series-1: #2a78d6;
    --series-2: #eb6834;
    --series-3: #1baf7a;
    --series-4: #eda100;
    --series-5: #e87ba4;

    --good: #0ca30c;
    --warning-ink: #8a6200;
    --warning-fill: #fab219;
    --critical: #d03b3b;

    --topbar-bg: #0f2d52;
    --topbar-bg-2: #163b68;
    --topbar-ink: #ffffff;
    --topbar-ink-2: #c7d3e2;
    --topbar-accent: #eda100;

    color-scheme: light;
  }
  @media (prefers-color-scheme: dark) {
    :root:not([data-theme="light"]) {
      --page: #0d0d0d;
      --surface: #1a1a19;
      --ink: #ffffff;
      --ink-2: #c3c2b7;
      --ink-muted: #898781;
      --hairline: #2c2c2a;
      --baseline: #383835;
      --ring: rgba(255,255,255,0.10);

      --accent: #3987e5;
      --series-1: #3987e5;
      --series-2: #d95926;
      --series-3: #199e70;
      --series-4: #c98500;
      --series-5: #d55181;

      --good: #0ca30c;
      --warning-ink: #fab219;
      --warning-fill: #fab219;
      --critical: #e66767;

      color-scheme: dark;
    }
  }
  :root[data-theme="dark"] {
    --page: #0d0d0d;
    --surface: #1a1a19;
    --ink: #ffffff;
    --ink-2: #c3c2b7;
    --ink-muted: #898781;
    --hairline: #2c2c2a;
    --baseline: #383835;
    --ring: rgba(255,255,255,0.10);

    --accent: #3987e5;
    --series-1: #3987e5;
    --series-2: #d95926;
    --series-3: #199e70;
    --series-4: #c98500;
    --series-5: #d55181;

    --good: #0ca30c;
    --warning-ink: #fab219;
    --warning-fill: #fab219;
    --critical: #e66767;

    color-scheme: dark;
  }

  * { box-sizing: border-box; }
  html, body { margin: 0; }
  body {
    background: var(--page);
    color: var(--ink);
    font-family: "Public Sans", system-ui, -apple-system, "Segoe UI", sans-serif;
    -webkit-font-smoothing: antialiased;
  }
  a { color: var(--accent); }
  a:hover { color: var(--series-1); }
  .num { font-variant-numeric: tabular-nums; }
  h1, h2, .font-head { font-family: "Plus Jakarta Sans", system-ui, sans-serif; }

  .topbar {
    display: flex; align-items: center; justify-content: space-between;
    height: 64px; padding: 0 32px;
    background: linear-gradient(180deg, var(--topbar-bg) 0%, var(--topbar-bg-2) 100%);
  }
  .brand { display: flex; align-items: center; gap: 12px; }
  .brand-text { display: flex; flex-direction: column; line-height: 1.25; }
  .brand-title { font-weight: 800; font-size: 15px; color: var(--topbar-ink); letter-spacing: 0.2px; }
  .brand-sub { font-size: 12px; color: var(--topbar-ink-2); }
  .profile { display: flex; align-items: center; gap: 10px; }
  .avatar {
    width: 32px; height: 32px; border-radius: 50%; background: rgba(255,255,255,0.14);
    color: var(--topbar-ink); display: flex; align-items: center; justify-content: center;
    font-weight: 700; font-size: 12px; border: 1px solid rgba(255,255,255,0.24);
    flex-shrink: 0;
  }
  .profile-text { display: flex; flex-direction: column; line-height: 1.25; text-align: right; }
  .profile-role { font-size: 12px; color: var(--topbar-ink); font-weight: 600; }
  .profile-org { font-size: 11px; color: var(--topbar-ink-2); }

  .filterbar {
    display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px;
    padding: 16px 32px; background: var(--surface); border-bottom: 1px solid var(--hairline);
  }
  .page-title { font-weight: 800; font-size: 19px; color: var(--ink); }
  .page-note { font-size: 11.5px; color: var(--ink-muted); font-style: italic; margin-top: 3px; }
  .filters { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
  .chip {
    display: flex; align-items: center; gap: 6px;
    height: 34px; padding: 0 12px; border-radius: 8px; border: 1px solid var(--ring);
    background: var(--page); font-size: 12.5px; font-weight: 600; color: var(--ink-2);
  }
  .chip svg { color: var(--ink-muted); flex-shrink: 0; }

  .content { max-width: 1400px; margin: 0 auto; padding: 24px 32px 48px 32px; display: flex; flex-direction: column; gap: 20px; }

  .kpi-row { display: grid; grid-template-columns: repeat(5, minmax(200px, 1fr)); gap: 16px; }
  .kpi-card {
    background: var(--surface); border: 1px solid var(--ring); border-radius: 12px;
    padding: 16px; display: flex; flex-direction: column; gap: 10px;
  }
  .kpi-label { font-size: 12px; color: var(--ink-2); font-weight: 600; }
  .kpi-value { font-weight: 800; font-size: 26px; color: var(--ink); }
  .kpi-sub { font-size: 11.5px; color: var(--ink-muted); }

  .status-pill { display: inline-flex; align-items: center; gap: 5px; font-size: 11.5px; font-weight: 700; }
  .status-pill.is-good { color: var(--good); }
  .status-pill.is-warning { color: var(--warning-ink); }
  .status-pill.is-critical { color: var(--critical); }
  .status-pill svg { flex-shrink: 0; }

  .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
  @media (max-width: 900px) { .grid-2, .kpi-row { grid-template-columns: 1fr; } }

  .panel {
    background: var(--surface); border: 1px solid var(--ring); border-radius: 12px;
    padding: 20px; display: flex; flex-direction: column; gap: 16px;
  }
  .panel-head { display: flex; flex-direction: column; gap: 3px; }
  .panel-title { font-weight: 700; font-size: 15px; color: var(--ink); }
  .panel-sub { font-size: 12px; color: var(--ink-muted); }

  .prog-list { display: flex; flex-direction: column; gap: 14px; }
  .prog-row { display: flex; flex-direction: column; gap: 6px; }
  .prog-top { display: flex; align-items: baseline; justify-content: space-between; gap: 12px; }
  .prog-label { font-size: 13px; font-weight: 600; color: var(--ink); }
  .prog-amount { font-size: 11.5px; color: var(--ink-muted); }
  .prog-pct { font-size: 13px; font-weight: 700; color: var(--ink); }
  .bar-track { position: relative; height: 8px; border-radius: 4px; background: var(--hairline); overflow: hidden; }
  .bar-fill { position: absolute; left: 0; top: 0; bottom: 0; border-radius: 4px; }

  .divider { height: 1px; background: var(--hairline); }

  .subblock-title { font-size: 12px; font-weight: 700; color: var(--ink-2); text-transform: uppercase; letter-spacing: 0.4px; margin: 0 0 10px 0; }
  .satker-list { display: flex; flex-direction: column; gap: 8px; }
  .satker-row { display: flex; align-items: center; justify-content: space-between; gap: 12px; font-size: 12.5px; }
  .satker-name { color: var(--ink-2); }
  .satker-pct { font-weight: 700; color: var(--critical); }

  .chart-legend { display: flex; align-items: center; gap: 16px; flex-wrap: wrap; }
  .legend-item { display: flex; align-items: center; gap: 6px; font-size: 12px; color: var(--ink-2); font-weight: 600; }
  .legend-dot { width: 8px; height: 8px; border-radius: 50%; flex-shrink: 0; }

  .donut-wrap { display: flex; align-items: center; gap: 24px; flex-wrap: wrap; }
  .donut-legend { display: flex; flex-direction: column; gap: 10px; flex: 1; min-width: 180px; }
  .sector-row { display: flex; align-items: center; justify-content: space-between; gap: 8px; }
  .sector-name { display: flex; align-items: center; gap: 8px; font-size: 12.5px; color: var(--ink); font-weight: 600; }
  .sector-pct { font-size: 12.5px; color: var(--ink-2); font-weight: 700; }

  .kur-stats { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
  .kur-stat { display: flex; flex-direction: column; gap: 2px; }
  .kur-stat-label { font-size: 11px; color: var(--ink-muted); }
  .kur-stat-value { font-weight: 700; font-size: 15px; color: var(--ink); }

  .table-scroll { overflow-x: auto; }
  table.data-table { width: 100%; border-collapse: collapse; min-width: 560px; }
  .data-table th {
    text-align: left; font-size: 11.5px; font-weight: 700; color: var(--ink-muted);
    text-transform: uppercase; letter-spacing: 0.3px; padding: 0 12px 10px 12px; border-bottom: 1px solid var(--hairline);
  }
  .data-table th.num-col, .data-table td.num-col { text-align: right; }
  .data-table td { font-size: 13px; padding: 12px; border-bottom: 1px solid var(--hairline); color: var(--ink); }
  .data-table tr:last-child td { border-bottom: none; }
  .kab-name { font-weight: 600; }

  .chart-svg text { fill: var(--ink-muted); }
</style>
</head>
<body>

  <div class="topbar">
    <div class="brand">
      <svg viewBox="0 0 24 24" width="28" height="28" fill="none" aria-hidden="true">
        <path d="M12 2.5l7.5 3v6c0 5-3.2 8.5-7.5 10-4.3-1.5-7.5-5-7.5-10v-6l7.5-3z" stroke="var(--topbar-accent)" stroke-width="1.5" stroke-linejoin="round"/>
        <path d="M12 7.4l1 2.1 2.3.3-1.7 1.6.4 2.3-2-1.1-2 1.1.4-2.3-1.7-1.6 2.3-.3 1-2.1z" fill="var(--topbar-accent)"/>
      </svg>
      <div class="brand-text">
        <span class="brand-title">Direktorat Jenderal Perbendaharaan</span>
        <span class="brand-sub">Kantor Wilayah Provinsi Jawa Barat</span>
      </div>
    </div>
    <div class="profile">
      <div class="profile-text">
        <span class="profile-role">Kepala Kantor Wilayah</span>
        <span class="profile-org">Kanwil DJPb Provinsi Jawa Barat</span>
      </div>
      <div class="avatar">KK</div>
    </div>
  </div>

  <div class="filterbar">
    <div>
      <div class="page-title">Ringkasan Kinerja Fiskal &amp; Ekonomi Regional</div>
      <div class="page-note">Data bersifat ilustrasi untuk kebutuhan mockup, bukan angka realisasi resmi</div>
    </div>
    <div class="filters">
      <div class="chip">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M3 10h18M8 3v4M16 3v4"/></svg>
        Semester I 2026
      </div>
      <div class="chip">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 21s7-6.1 7-11.5A7 7 0 0 0 5 9.5C5 14.9 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.3"/></svg>
        Seluruh Kabupaten/Kota
      </div>
    </div>
  </div>

  <div class="content">

    <div class="kpi-row">
      <div class="kpi-card">
        <span class="kpi-label">Realisasi Belanja APBN</span>
        <span class="kpi-value num">68,4%</span>
        <span class="kpi-sub">Pagu Rp 24,8 T &bull; Realisasi Rp 16,9 T</span>
        <span class="status-pill is-good">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M8.5 12.5l2.3 2.3L16 9.5"/></svg>
          Sesuai target
        </span>
      </div>
      <div class="kpi-card">
        <span class="kpi-label">Realisasi Transfer ke Daerah</span>
        <span class="kpi-value num">61,2%</span>
        <span class="kpi-sub">Pagu Rp 18,3 T &bull; Realisasi Rp 11,2 T</span>
        <span class="status-pill is-warning">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3.5L21 19.5H3L12 3.5Z"/><path d="M12 9.5v4.5"/><path d="M12 17h.01"/></svg>
          Perlu akselerasi
        </span>
      </div>
      <div class="kpi-card">
        <span class="kpi-label">Pertumbuhan Ekonomi (PDRB)</span>
        <span class="kpi-value num">5,1%</span>
        <span class="kpi-sub">Year on year, Triwulan IV 2025</span>
        <span class="status-pill is-good">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M8.5 12.5l2.3 2.3L16 9.5"/></svg>
          Sesuai target
        </span>
      </div>
      <div class="kpi-card">
        <span class="kpi-label">Inflasi Regional (IHK)</span>
        <span class="kpi-value num">2,8%</span>
        <span class="kpi-sub">Dalam sasaran 2,5% - 4,5%</span>
        <span class="status-pill is-good">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M8.5 12.5l2.3 2.3L16 9.5"/></svg>
          Sesuai target
        </span>
      </div>
      <div class="kpi-card">
        <span class="kpi-label">Penyaluran KUR</span>
        <span class="kpi-value num">Rp 3,2 T</span>
        <span class="kpi-sub">18.450 debitur &bull; NPL 1,8%</span>
        <span class="status-pill is-good">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M8.5 12.5l2.3 2.3L16 9.5"/></svg>
          Sesuai target
        </span>
      </div>
    </div>

    <div class="grid-2">

      <div class="panel">
        <div class="panel-head">
          <span class="panel-title">Realisasi Belanja APBN</span>
          <span class="panel-sub">Pagu Rp 24,8 Triliun &mdash; Semester I 2026</span>
        </div>
        <div class="prog-list">
          <div class="prog-row">
            <div class="prog-top"><span class="prog-label">Belanja Pegawai</span><span class="prog-pct num">72%</span></div>
            <div class="bar-track"><div class="bar-fill" style="width:72%; background:var(--good)"></div></div>
            <span class="prog-amount">Pagu Rp 8,1 T</span>
          </div>
          <div class="prog-row">
            <div class="prog-top"><span class="prog-label">Belanja Barang</span><span class="prog-pct num">65%</span></div>
            <div class="bar-track"><div class="bar-fill" style="width:65%; background:var(--warning-fill)"></div></div>
            <span class="prog-amount">Pagu Rp 6,4 T</span>
          </div>
          <div class="prog-row">
            <div class="prog-top"><span class="prog-label">Belanja Modal</span><span class="prog-pct num">58%</span></div>
            <div class="bar-track"><div class="bar-fill" style="width:58%; background:var(--warning-fill)"></div></div>
            <span class="prog-amount">Pagu Rp 7,3 T</span>
          </div>
          <div class="prog-row">
            <div class="prog-top"><span class="prog-label">Bantuan Sosial</span><span class="prog-pct num">81%</span></div>
            <div class="bar-track"><div class="bar-fill" style="width:81%; background:var(--good)"></div></div>
            <span class="prog-amount">Pagu Rp 3,0 T</span>
          </div>
        </div>
        <div class="divider"></div>
        <div>
          <p class="subblock-title">Satker dengan realisasi terendah</p>
          <div class="satker-list">
            <div class="satker-row"><span class="satker-name">Satker Pembangunan Jalan Wilayah III</span><span class="satker-pct num">32%</span></div>
            <div class="satker-row"><span class="satker-name">Satker Balai Irigasi Regional</span><span class="satker-pct num">41%</span></div>
            <div class="satker-row"><span class="satker-name">Satker Rehabilitasi Fasilitas Kesehatan</span><span class="satker-pct num">45%</span></div>
          </div>
        </div>
      </div>

      <div class="panel">
        <div class="panel-head">
          <span class="panel-title">Transfer ke Daerah &amp; Realisasi APBD</span>
          <span class="panel-sub">Pagu TKD Rp 18,3 Triliun &mdash; Semester I 2026</span>
        </div>
        <div class="prog-list">
          <div class="prog-row">
            <div class="prog-top"><span class="prog-label">Dana Alokasi Umum (DAU)</span><span class="prog-pct num">70%</span></div>
            <div class="bar-track"><div class="bar-fill" style="width:70%; background:var(--good)"></div></div>
            <span class="prog-amount">Pagu Rp 7,8 T</span>
          </div>
          <div class="prog-row">
            <div class="prog-top"><span class="prog-label">DAK Fisik</span><span class="prog-pct num">45%</span></div>
            <div class="bar-track"><div class="bar-fill" style="width:45%; background:var(--critical)"></div></div>
            <span class="prog-amount">Pagu Rp 3,1 T</span>
          </div>
          <div class="prog-row">
            <div class="prog-top"><span class="prog-label">DAK Non Fisik</span><span class="prog-pct num">66%</span></div>
            <div class="bar-track"><div class="bar-fill" style="width:66%; background:var(--warning-fill)"></div></div>
            <span class="prog-amount">Pagu Rp 2,6 T</span>
          </div>
          <div class="prog-row">
            <div class="prog-top"><span class="prog-label">Dana Bagi Hasil (DBH)</span><span class="prog-pct num">58%</span></div>
            <div class="bar-track"><div class="bar-fill" style="width:58%; background:var(--warning-fill)"></div></div>
            <span class="prog-amount">Pagu Rp 2,4 T</span>
          </div>
          <div class="prog-row">
            <div class="prog-top"><span class="prog-label">Dana Desa</span><span class="prog-pct num">74%</span></div>
            <div class="bar-track"><div class="bar-fill" style="width:74%; background:var(--good)"></div></div>
            <span class="prog-amount">Pagu Rp 2,4 T</span>
          </div>
        </div>
      </div>

    </div>

    <div class="grid-2">

      <div class="panel">
        <div class="panel-head">
          <span class="panel-title">Indikator Ekonomi Regional</span>
          <span class="panel-sub">Pertumbuhan PDRB vs Inflasi (IHK), year on year</span>
        </div>
        <div class="chart-legend">
          <div class="legend-item"><span class="legend-dot" style="background:var(--series-1)"></span>Pertumbuhan PDRB</div>
          <div class="legend-item"><span class="legend-dot" style="background:var(--series-2)"></span>Inflasi (IHK)</div>
        </div>
        <svg class="chart-svg" viewBox="0 0 640 200" width="100%" height="200" preserveAspectRatio="xMidYMid meet" role="img" aria-label="Grafik pertumbuhan PDRB dan inflasi enam triwulan terakhir">
          <line x1="50" y1="10" x2="620" y2="10" stroke="var(--hairline)" stroke-width="1"/>
          <line x1="50" y1="50" x2="620" y2="50" stroke="var(--hairline)" stroke-width="1"/>
          <line x1="50" y1="90" x2="620" y2="90" stroke="var(--hairline)" stroke-width="1"/>
          <line x1="50" y1="130" x2="620" y2="130" stroke="var(--hairline)" stroke-width="1"/>
          <line x1="50" y1="170" x2="620" y2="170" stroke="var(--baseline)" stroke-width="1.2"/>

          <text x="38" y="14" text-anchor="end" font-size="10.5">6%</text>
          <text x="38" y="94" text-anchor="end" font-size="10.5">4%</text>
          <text x="38" y="174" text-anchor="end" font-size="10.5">2%</text>

          <polyline points="50,146 164,134 278,126 392,138 506,150 620,138" fill="none" stroke="var(--series-2)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <polyline points="50,54 164,50 278,62 392,42 506,34 620,46" fill="none" stroke="var(--series-1)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>

          <circle cx="620" cy="46" r="4" style="fill:var(--series-1)"/>
          <circle cx="620" cy="138" r="4" style="fill:var(--series-2)"/>
          <text x="600" y="30" text-anchor="end" font-size="11" font-weight="700" style="fill:var(--series-1)">5,1%</text>
          <text x="600" y="156" text-anchor="end" font-size="11" font-weight="700" style="fill:var(--series-2)">2,8%</text>

          <text x="50" y="192" font-size="10.5">Q3'24</text>
          <text x="150" y="192" font-size="10.5">Q4'24</text>
          <text x="262" y="192" font-size="10.5">Q1'25</text>
          <text x="376" y="192" font-size="10.5">Q2'25</text>
          <text x="490" y="192" font-size="10.5">Q3'25</text>
          <text x="596" y="192" font-size="10.5">Q4'25</text>
        </svg>
      </div>

      <div class="panel">
        <div class="panel-head">
          <span class="panel-title">Penyaluran Kredit Usaha Rakyat (KUR)</span>
          <span class="panel-sub">Komposisi penyaluran menurut sektor usaha</span>
        </div>
        <div class="donut-wrap">
          <svg viewBox="0 0 180 180" width="150" height="150" role="img" aria-label="Donut chart komposisi penyaluran KUR menurut sektor">
            <g transform="rotate(-90 90 90)">
              <circle cx="90" cy="90" r="70" fill="none" style="stroke:var(--series-1)" stroke-width="26" stroke-dasharray="149.54 290.28" stroke-dashoffset="0"/>
              <circle cx="90" cy="90" r="70" fill="none" style="stroke:var(--series-2)" stroke-width="26" stroke-dasharray="123.19 316.63" stroke-dashoffset="-149.54"/>
              <circle cx="90" cy="90" r="70" fill="none" style="stroke:var(--series-3)" stroke-width="26" stroke-dasharray="79.17 360.65" stroke-dashoffset="-272.73"/>
              <circle cx="90" cy="90" r="70" fill="none" style="stroke:var(--series-4)" stroke-width="26" stroke-dasharray="52.78 387.04" stroke-dashoffset="-351.90"/>
              <circle cx="90" cy="90" r="70" fill="none" style="stroke:var(--series-5)" stroke-width="26" stroke-dasharray="35.19 404.63" stroke-dashoffset="-404.68"/>
            </g>
            <circle cx="90" cy="90" r="42" style="fill:var(--surface)"/>
            <text x="90" y="86" text-anchor="middle" font-size="18" font-weight="800" style="fill:var(--ink)">Rp 3,2T</text>
            <text x="90" y="102" text-anchor="middle" font-size="10.5" style="fill:var(--ink-muted)">total tersalur</text>
          </svg>
          <div class="donut-legend">
            <div class="sector-row"><span class="sector-name"><span class="legend-dot" style="background:var(--series-1)"></span>Pertanian</span><span class="sector-pct num">34%</span></div>
            <div class="sector-row"><span class="sector-name"><span class="legend-dot" style="background:var(--series-2)"></span>Perdagangan</span><span class="sector-pct num">28%</span></div>
            <div class="sector-row"><span class="sector-name"><span class="legend-dot" style="background:var(--series-3)"></span>Jasa</span><span class="sector-pct num">18%</span></div>
            <div class="sector-row"><span class="sector-name"><span class="legend-dot" style="background:var(--series-4)"></span>Industri Pengolahan</span><span class="sector-pct num">12%</span></div>
            <div class="sector-row"><span class="sector-name"><span class="legend-dot" style="background:var(--series-5)"></span>Lainnya</span><span class="sector-pct num">8%</span></div>
          </div>
        </div>
        <div class="divider"></div>
        <div class="kur-stats">
          <div class="kur-stat"><span class="kur-stat-label">Jumlah debitur</span><span class="kur-stat-value num">18.450</span></div>
          <div class="kur-stat"><span class="kur-stat-label">Rata-rata plafon</span><span class="kur-stat-value num">Rp 173 juta</span></div>
          <div class="kur-stat"><span class="kur-stat-label">NPL</span><span class="kur-stat-value num" style="color:var(--good)">1,8%</span></div>
          <div class="kur-stat"><span class="kur-stat-label">Pertumbuhan penyaluran</span><span class="kur-stat-value num" style="color:var(--good)">+12,4%</span></div>
        </div>
      </div>

    </div>

    <div class="panel">
      <div class="panel-head">
        <span class="panel-title">Realisasi per Kabupaten/Kota yang Perlu Perhatian</span>
        <span class="panel-sub">Diurutkan berdasarkan realisasi APBN terendah</span>
      </div>
      <div class="table-scroll">
        <table class="data-table">
          <thead>
            <tr>
              <th>Kabupaten/Kota</th>
              <th class="num-col">Realisasi APBN</th>
              <th class="num-col">Realisasi APBD</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="kab-name">Kota Bandung</td><td class="num-col num">74%</td><td class="num-col num">69%</td>
              <td><span class="status-pill is-good"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M8.5 12.5l2.3 2.3L16 9.5"/></svg>Sesuai target</span></td>
            </tr>
            <tr>
              <td class="kab-name">Kota Bekasi</td><td class="num-col num">70%</td><td class="num-col num">66%</td>
              <td><span class="status-pill is-good"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M8.5 12.5l2.3 2.3L16 9.5"/></svg>Sesuai target</span></td>
            </tr>
            <tr>
              <td class="kab-name">Kabupaten Bandung</td><td class="num-col num">61%</td><td class="num-col num">58%</td>
              <td><span class="status-pill is-warning"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3.5L21 19.5H3L12 3.5Z"/><path d="M12 9.5v4.5"/><path d="M12 17h.01"/></svg>Perlu perhatian</span></td>
            </tr>
            <tr>
              <td class="kab-name">Kabupaten Bogor</td><td class="num-col num">55%</td><td class="num-col num">49%</td>
              <td><span class="status-pill is-warning"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3.5L21 19.5H3L12 3.5Z"/><path d="M12 9.5v4.5"/><path d="M12 17h.01"/></svg>Perlu perhatian</span></td>
            </tr>
            <tr>
              <td class="kab-name">Kabupaten Cianjur</td><td class="num-col num">44%</td><td class="num-col num">51%</td>
              <td><span class="status-pill is-critical"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M9.5 9.5l5 5M14.5 9.5l-5 5"/></svg>Kritis</span></td>
            </tr>
            <tr>
              <td class="kab-name">Kabupaten Sukabumi</td><td class="num-col num">38%</td><td class="num-col num">42%</td>
              <td><span class="status-pill is-critical"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M9.5 9.5l5 5M14.5 9.5l-5 5"/></svg>Kritis</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>

</body>
</html>
