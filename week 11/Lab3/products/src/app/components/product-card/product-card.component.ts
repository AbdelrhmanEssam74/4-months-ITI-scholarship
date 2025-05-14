import {Component, Input} from '@angular/core';
import {NgClass} from '@angular/common';

@Component({
  selector: 'app-product-card',
  imports: [
    NgClass
  ],
  templateUrl: './product-card.component.html',
  styleUrl: './product-card.component.css'
})
export class ProductCardComponent {
  @Input() product: any;

  getStarArray(rating: number): string[] {
    const fullStars = Math.round(rating); // Round to nearest full star
    return Array(fullStars).fill('★');
  }
}
