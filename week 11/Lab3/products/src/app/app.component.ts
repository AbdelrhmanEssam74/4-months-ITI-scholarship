import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import {NavBarComponent} from './components/nav-bar/nav-bar.component';
import {ProductWrapperComponent} from './components/product-wrapper/product-wrapper.component';

@Component({
  selector: 'app-root',
  imports: [ NavBarComponent, ProductWrapperComponent],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent {
  title = 'products';
}
