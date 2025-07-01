{{-- filepath: d:\Projectan\seacatering\seacatering\resources\views\dashboard.blade.php --}}
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <style>
 .modal-confirm {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0; top: 0;
    width: 100vw; height: 100vh;
    background: rgba(0,0,0,0.4);
    justify-content: center;
    align-items: center;
}
.modal-confirm[style*="display: flex"] {
    display: flex !important;
}
.modal-confirm-content {
    background: #fff;
    color: #222;
    padding: 32px 24px;
    border-radius: 10px;
    min-width: 280px;
    max-width: 90vw;
    box-shadow: 0 8px 32px rgba(0,0,0,0.18);
    text-align: center;
    position: relative;
    margin: 0 auto;
    animation: modalPop .2s cubic-bezier(.4,2,.6,1.2);
}
@keyframes modalPop {
    0% { transform: scale(0.8); opacity: 0; }
    100% { transform: scale(1); opacity: 1; }
}
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">SEA Catering Subscription Metrics</h3>

                    <!-- Date Range Selector -->
                    <form method="GET" action="{{ route('dashboard') }}" class="mb-6 flex gap-4 items-end">
                        <div>
                            <label for="start_date" class="block text-sm">Start Date</label>
                            <input type="date" id="start_date" name="start_date" value="{{ request('start_date') }}"
                                class="border rounded px-2 py-1">
                        </div>
                        <div>
                            <label for="end_date" class="block text-sm">End Date</label>
                            <input type="date" id="end_date" name="end_date" value="{{ request('end_date') }}"
                                class="border rounded px-2 py-1">
                        </div>
                        <button type="submit" class="btn-submit">Filter</button>
                    </form>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- New Subscriptions -->
                        <div class="bg-yellow-100 p-4 rounded shadow dashboard-card cursor-pointer" data-type="new">
                            <div class="text-sm text-gray-600">New Subscriptions</div>
                            <div class="text-2xl font-bold">{{ $newSubscriptions }}</div>
                        </div>
                        <!-- MRR -->
                        <div class="bg-green-100 p-4 rounded shadow dashboard-card cursor-pointer" data-type="mrr">
                            <div class="text-sm text-gray-600">Monthly Recurring Revenue (MRR)</div>
                            <div class="text-2xl font-bold">Rp {{ number_format($mrr, 0, ',', '.') }}</div>
                        </div>
                        <!-- Reactivations -->
                        <div class="bg-blue-100 p-4 rounded shadow dashboard-card cursor-pointer"
                            data-type="reactivation">
                            <div class="text-sm text-gray-600">Reactivations</div>
                            <div class="text-2xl font-bold">{{ $reactivations }}</div>
                        </div>
                        <!-- Subscription Growth -->
                        <div class="bg-pink-100 p-4 rounded shadow dashboard-card cursor-pointer" data-type="active">
                            <div class="text-sm text-gray-600">Active Subscriptions</div>
                            <div class="text-2xl font-bold">{{ $activeSubscriptions }}</div>
                        </div>
                    </div>

                    <!-- Modal Detail List -->
                    <div id="detailModal" class="modal-confirm" style="display:none;">
                        <div class="modal-confirm-content" style="max-width:500px;">
                            <h3 id="modalTitle"></h3>
                            <div id="modalBody" style="max-height:300px;overflow:auto;"></div>
                            <div class="modal-confirm-actions">
                                <button id="closeDetailModal" class="btn-cancel">Tutup</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('detailModal');
            const modalTitle = document.getElementById('modalTitle');
            const modalBody = document.getElementById('modalBody');
            const closeBtn = document.getElementById('closeDetailModal');

            // Data dari backend (Blade ke JS)
            const newSubs = @json($newSubscriptionsList);
            const mrrList = @json($mrrList);
            const reactivationsList = @json($reactivationsList);
            const activeList = @json($activeSubscriptionsList);

            function renderList(list) {
                if (list.length === 0) return '<p class="text-gray-500">Tidak ada data.</p>';
                return '<ul style="text-align:left;">' + list.map(item =>
                    `<li>
                        <b>${item.name}</b> (${item.email ?? '-'}),
                        Plan: ${item.plan ?? '-'},
                        Phone: ${item.phone ?? '-'}
                    </li>`
                ).join('') + '</ul>';
            }

            document.querySelectorAll('.dashboard-card').forEach(card => {
                card.addEventListener('click', function() {
                    let type = this.getAttribute('data-type');
                    let title = '';
                    let list = [];
                    if (type === 'new') {
                        title = 'Daftar New Subscriptions';
                        list = newSubs;
                    } else if (type === 'mrr') {
                        title = 'Daftar MRR Subscriptions';
                        list = mrrList;
                    } else if (type === 'reactivation') {
                        title = 'Daftar Reactivations';
                        list = reactivationsList;
                    } else if (type === 'active') {
                        title = 'Daftar Active Subscriptions';
                        list = activeList;
                    }
                    modalTitle.innerText = title;
                    modalBody.innerHTML = renderList(list);
                    modal.style.display = 'flex';
                });
            });

            closeBtn.onclick = function() {
                modal.style.display = 'none';
            };
            modal.onclick = function(e) {
                if (e.target === modal) modal.style.display = 'none';
            };
        });
    </script>
</x-app-layout>
