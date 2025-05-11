import { Component } from '@angular/core';
import {FormsModule} from '@angular/forms';
@Component({
  selector: 'app-form',
  imports: [
    FormsModule
  ],
  templateUrl: './form.component.html',
  styleUrl: './form.component.css'
})
export class FormComponent {
  searchQuery: string = '';
  onSearch(event: Event): void {
    event.preventDefault();
  }
}
