import {Component, Input} from '@angular/core';
import {NgClass} from '@angular/common';
import {RouterLink} from '@angular/router';
import {CartService} from '../../services/cart.service';

@Component({
  selector: 'app-product-card',
  imports: [
    NgClass,
    RouterLink
  ],
  templateUrl: './product-card.component.html',
  styleUrl: './product-card.component.css'
})
export class ProductCardComponent {
  constructor(private cartService: CartService) {}
  @Input() product: any;

  getStarArray(rating: number): string[] {
    const fullStars = Math.round(rating);
    return Array(fullStars).fill('★');
  }
  addToCart() {
    this.cartService.addToCart(this.product);
    alert('Product added to cart!');
  }
}
