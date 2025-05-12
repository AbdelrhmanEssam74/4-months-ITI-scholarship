import {Component, Input} from '@angular/core';
import {CommonModule} from '@angular/common';
import userData from '../../data/users.json';

@Component({
  selector: 'app-user-card',
  imports: [CommonModule],
  standalone: true,
  templateUrl: './user-card.component.html',
  styleUrls: ['./user-card.component.css']
})
export class UserCardComponent {
  users = userData;
}
