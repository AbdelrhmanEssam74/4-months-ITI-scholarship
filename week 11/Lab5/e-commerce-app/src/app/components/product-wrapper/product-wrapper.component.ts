import {Component} from '@angular/core';
import {ProductCardComponent} from '../product-card/product-card.component';
import {HttpClient} from '@angular/common/http';


@Component({
  selector: 'app-product-wrapper',
  imports: [
    ProductCardComponent
  ],
  templateUrl: './product-wrapper.component.html',
  styleUrl: './product-wrapper.component.css'
})
export class ProductWrapperComponent {
//   https://dummyjson.com/products
  constructor(private http: HttpClient) {
  }
  Products: any[] = [];
  ngOnInit() {
    this.http.get('https://dummyjson.com/products').subscribe((response: any) => {
      this.Products = response.products; 
    });
  }
}
