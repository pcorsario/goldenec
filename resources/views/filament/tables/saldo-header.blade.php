<div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg mb-4 grid grid-cols-2 gap-4">
    <div class="space-y-1">
        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Gastado:</p>
        <p class="text-xl font-bold text-red-600 dark:text-red-400">
            {{ number_format($suma, 2) }} USD
        </p>
    </div>
    
    <div class="space-y-1">
        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Saldo Restante:</p>
        <p class="text-xl font-bold text-green-600 dark:text-green-400">
            {{ number_format($saldo, 2) }} USD
        </p>
    </div>
</div>