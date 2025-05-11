import { Component } from '@angular/core';
import userData from '../data/users.json';
import { UserCardComponent } from './user-card/user-card.component';
import { FormComponent } from './form/form.component';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [UserCardComponent, FormComponent],
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Users-Project';
  users = userData;
}
