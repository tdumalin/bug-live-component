import { Controller } from '@hotwired/stimulus';
import datepicker from 'js-datepicker'

export default class extends Controller {
    static targets = ["input", "toggle"]

    datepicker;

    connect() {
        this.datepicker = datepicker(this.inputTarget, {
            customDays: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
            customMonths: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            onSelect: () => {
                this.inputTarget.dispatchEvent(new Event('change', { bubbles: true }));
            },
            formatter: (input, date) => {
                input.value = date.toLocaleDateString('fr-FR')
            },
        });

        this.toggleTarget.addEventListener('click', this._onToggleClick);
    }
    disconnect() {
        if (this.datepicker) {
            this.datepicker.remove();
            this.datepicker = null;
        }

        this.toggleTarget.removeEventListener('click', this._onToggleClick);
    }

    _onToggleClick = (e) => {
        e.stopPropagation();
        this.datepicker.show();
    }
}
