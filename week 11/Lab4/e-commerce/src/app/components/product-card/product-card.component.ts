import {Component, Input} from '@angular/core';
import {NgClass} from '@angular/common';
import {RouterLink} from '@angular/router';

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
  @Input() product: any;

  getStarArray(rating: number): string[] {
    const fullStars = Math.round(rating); // Round to nearest full star
    return Array(fullStars).fill('★');
  }
}
