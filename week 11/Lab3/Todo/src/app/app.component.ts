import { Component } from '@angular/core';
import {TodoWrapperComponent} from './components/todo-wrapper/todo-wrapper.component';

@Component({
  selector: 'app-root',
  imports: [TodoWrapperComponent],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent {
  title = 'Todo';
}
