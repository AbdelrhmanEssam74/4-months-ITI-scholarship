import {Component} from '@angular/core';
import {TodoListComponent} from '../todo-list/todo-list.component';
import {TodoFormComponent} from '../todo-form/todo-form.component';
import {Todo} from '../../interface/todo';

@Component({
  selector: 'app-todo-wrapper',
  imports: [
    TodoListComponent,
    TodoFormComponent
  ],
  templateUrl: './todo-wrapper.component.html',
  styleUrl: './todo-wrapper.component.css'
})
export class TodoWrapperComponent {
  todos: Todo[] = [
    {id: 1, text: 'Learn Angular', completed: false},
    {id: 2, text: 'Build a To-do App', completed: true},
    {id: 3, text: 'Deploy the App', completed: false}
  ];
}
