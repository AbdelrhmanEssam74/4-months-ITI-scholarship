import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';

@Injectable({ providedIn: 'root' })
export class CartService {
  private cartKey = 'cartItems';
  private cartItems: any[] = [];
  public cartCount = new BehaviorSubject<number>(0);

  constructor() {
    this.loadCart();
  }

  private loadCart() {
    const stored = localStorage.getItem(this.cartKey);
    this.cartItems = stored ? JSON.parse(stored) : [];
    this.cartCount.next(this.getTotalItems());
  }

  private saveCart() {
    localStorage.setItem(this.cartKey, JSON.stringify(this.cartItems));
    this.cartCount.next(this.getTotalItems());
  }

  getCart() {
    return this.cartItems;
  }

  getTotalItems(): number {
    return this.cartItems.reduce((sum, item) => sum + item.quantity, 0);
  }

  getTotalPrice(): number {
    return this.cartItems.reduce((sum, item) => sum + item.quantity * item.price, 0);
  }

  addToCart(product: any) {
    const existing = this.cartItems.find(p => p.id === product.id);
    if (existing) {
      existing.quantity += 1;
    } else {
      this.cartItems.push({ ...product, quantity: 1 });
    }
    this.saveCart();
  }

  increaseQty(productId: number) {
    const item = this.cartItems.find(p => p.id === productId);
    if (item) item.quantity += 1;
    this.saveCart();
  }

  decreaseQty(productId: number) {
    const item = this.cartItems.find(p => p.id === productId);
    if (item && item.quantity > 1) {
      item.quantity -= 1;
    } else {
      this.removeItem(productId);
    }
    this.saveCart();
  }

  removeItem(productId: number) {
    this.cartItems = this.cartItems.filter(p => p.id !== productId);
    this.saveCart();
  }

  clearCart() {
    this.cartItems = [];
    this.saveCart();
  }
}
