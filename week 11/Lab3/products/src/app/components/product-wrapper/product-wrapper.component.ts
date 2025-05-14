import {Component} from '@angular/core';
import {ProductCardComponent} from '../product-card/product-card.component';
import productDate from '../../../data/products.json';
import {Product} from '../../interface/product';

@Component({
  selector: 'app-product-wrapper',
  imports: [
    ProductCardComponent
  ],
  templateUrl: './product-wrapper.component.html',
  styleUrl: './product-wrapper.component.css'
})
export class ProductWrapperComponent {
  // Products: Product[] = productDate.products;
  Products: any = productDate.products;

}
