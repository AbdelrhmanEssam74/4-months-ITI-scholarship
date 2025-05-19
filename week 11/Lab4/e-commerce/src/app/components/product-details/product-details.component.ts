import { Component, OnInit } from '@angular/core';
import {ActivatedRoute, RouterLink} from '@angular/router';
import productData from '../../../data/products.json';
import { Product } from '../../interface/product';
import {CurrencyPipe} from '@angular/common';

@Component({
  selector: 'app-product-details',
  templateUrl: './product-details.component.html',
  imports: [
    CurrencyPipe,
    RouterLink
  ],
  styleUrls: ['./product-details.component.css']
})
export class ProductDetailsComponent implements OnInit {
  product!: Product;

  constructor(private route: ActivatedRoute) {}
  getStars(rating: number): number[] {
    const fullStars = Math.floor(rating);
    return Array(fullStars).fill(0);
  }

  ngOnInit(): void {
    const id = Number(this.route.snapshot.paramMap.get('id'));
    const foundProduct = productData.products.find(p => p.id === id);
    if (foundProduct) {
      this.product = {
        ...foundProduct,
        brand: foundProduct.brand || ''
      };
    }
  }
}
