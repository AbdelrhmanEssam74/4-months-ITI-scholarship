import {Component, OnInit} from '@angular/core';
import {CartService} from '../../services/cart.service';

@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html'
})
export class CartComponent implements OnInit {
  cartItems: any[] = [];

  constructor(private cartService: CartService) {
  }
  updateCart() {
    localStorage.setItem('cart', JSON.stringify(this.cartItems));
  }
  ngOnInit() {
    this.loadItems();
  }

  loadItems() {
    this.cartItems = this.cartService.getCart();
  }

  increaseQty(item: any) {
    if (item.quantity < item.stock) {
      item.quantity++;
      this.updateCart();
    }
  }

  decreaseQty(item: any) {
    if (item.quantity > 1) {
      item.quantity--;
      this.updateCart();
    }
  }

  removeItem(item: any) {
    this.cartService.removeItem(item.id);
    this.loadItems();
  }

  getTotal() {
    return this.cartService.getTotalPrice();
  }
}
