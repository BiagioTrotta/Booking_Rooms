import './bootstrap';
import 'bootstrap';

//Invertire date intervallo filtro
document.addEventListener('DOMContentLoaded', function () {
    // Funzione per invertire la singola data nel formato "giorno, mese, anno"
    function reverseDate(dateString) {
        if (!dateString) return ''; // Se la stringa è vuota, restituisci una stringa vuota
        const [year, month, day] = dateString.split('-').map(part => part.trim()); // Dividi la data in anno, mese e giorno
        return `${day}-${month}-${year}`; // Inverti l'ordine e restituisci la data nel formato "giorno-mese-anno"
    }

    // Ottieni l'elemento di input dateRange
    const dateRangeInput = document.getElementById('dateRange');

    // Assicurati che l'elemento esista prima di continuare
    if (dateRangeInput) {
        // Dividi la stringa dataRange inizio-fine
        const dateRange = dateRangeInput.value.split(' to ').map(date => date.trim());

        // Verifica se ci sono entrambe le date
        if (dateRange.length === 2) {
            // Inverti le singole date e aggiorna il valore dell'input
            dateRangeInput.value = `${reverseDate(dateRange[0])} to ${reverseDate(dateRange[1])}`;
        }
    }
});
