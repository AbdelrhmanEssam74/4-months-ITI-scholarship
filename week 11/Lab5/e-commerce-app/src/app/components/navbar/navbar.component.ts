import { Component } from '@angular/core';
import {RouterLink, RouterLinkActive, RouterOutlet} from '@angular/router';
import {CartService} from '../../services/cart.service';

@Component({
  selector: 'app-nav-bar',
  imports: [
    RouterOutlet,
    RouterLink,
    RouterLinkActive
  ],
  templateUrl: './navbar.component.html',
  styleUrl: './navbar.component.css'
})
export class NavBarComponent {
  constructor(private cartService: CartService) {}
  itemCount = 0;
  ngOnInit() {
    this.cartService.cartCount.subscribe(count => {
      this.itemCount = count;
    });
  }
}
