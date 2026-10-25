document.addEventListener('DOMContentLoaded', () => {
  const t = document.getElementById('menuToggle'),
    s = document.getElementById('sidebar');
  if (t && s) t.addEventListener('click', () => s.classList.toggle('open'));
  const c = document.getElementById('registrationChart'),
    f = document.getElementById('chartFallback'),
    el = document.getElementById('chartData');
  if (!c || !el) return;
  let rows = [];
  try {
    rows = JSON.parse(el.textContent || '[]')
  } catch {}
  if (typeof Chart === 'undefined') {
    if (f) f.classList.remove('hidden');
    return;
  }
  new Chart(c, {
    type: 'bar',
    data: {
      labels: rows.map(x => x.month_label),
      datasets: [{
        label: 'Registrations',
        data: rows.map(x => Number(x.total)),
        backgroundColor: 'rgba(112,93,239,.78)',
        borderColor: '#705def',
        borderWidth: 1,
        borderRadius: 7
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            precision: 0
          }
        },
        x: {
          grid: {
            display: false
          }
        }
      }
    }
  });
});