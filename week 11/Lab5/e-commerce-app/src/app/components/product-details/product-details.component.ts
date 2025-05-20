import {Component, OnInit} from '@angular/core';
import {ActivatedRoute, RouterLink} from '@angular/router';
import {Product} from '../../interface/product';
import {CurrencyPipe} from '@angular/common';
import {HttpClient} from '@angular/common/http';

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

  constructor(private route: ActivatedRoute, private http: HttpClient) {
  }

  getStars(rating: number): number[] {
    const fullStars = Math.floor(rating);
    return Array(fullStars).fill(0);
  }

  ngOnInit(): void {
    const id = Number(this.route.snapshot.paramMap.get('id'));
    this.http.get(`https://dummyjson.com/products/${id}`).subscribe((response: any) => {
      this.product = {
        ...response,
        brand: response.brand || ''
      };
    });
  }
}
