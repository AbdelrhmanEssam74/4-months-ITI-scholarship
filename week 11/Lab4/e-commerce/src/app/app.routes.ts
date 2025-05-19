import {Routes} from '@angular/router';
import {ProductWrapperComponent} from './components/product-wrapper/product-wrapper.component';
import {LoginComponent} from './components/login/login.component';
import {RegitserComponent} from './components/regitser/regitser.component';
import {CartComponent} from './components/cart/cart.component';
import {NotFoundComponent} from './components/not-found/not-found.component';
import { ProductDetailsComponent } from './components/product-details/product-details.component';
export const routes: Routes = [
  {path: '', redirectTo: 'home', pathMatch: 'full'},
  {path: 'home', component: ProductWrapperComponent},
  {path: 'login', component: LoginComponent},
  {path: 'register', component: RegitserComponent},
  {path: 'cart', component: CartComponent},
  { path: 'product/:id', component: ProductDetailsComponent },
  {path: '**', component: NotFoundComponent}

];
