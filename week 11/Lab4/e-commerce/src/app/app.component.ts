import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import {ProductWrapperComponent} from './components/product-wrapper/product-wrapper.component';
import {NavBarComponent} from './components/navbar/navbar.component';

@Component({
  selector: 'app-root',
  imports: [RouterOutlet, ProductWrapperComponent, NavBarComponent],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent {
  title = 'e-commerce';
}
