import { Component } from '@angular/core';
import {NavBarComponent} from './components/navbar/navbar.component';

@Component({
  selector: 'app-root',
  imports: [NavBarComponent],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent {
  title = 'e-commerce';
}
