import {Component} from '@angular/core';
import {TodoListComponent} from '../todo-list/todo-list.component';
import {TodoFormComponent} from '../todo-form/todo-form.component';
import {Todo} from '../../interface/todo';
import {CompletedTasksComponent} from '../completed-tasks/completed-tasks.component';

@Component({
  selector: 'app-todo-wrapper',
  imports: [
    TodoListComponent,
    TodoFormComponent,
    CompletedTasksComponent
  ],
  templateUrl: './todo-wrapper.component.html',
  styleUrl: './todo-wrapper.component.css'
})
export class TodoWrapperComponent {
  todos: Todo[] = [
    {id: 1, text: 'Learn Angular', completed: true},
    {id: 2, text: 'Build a To-do App', completed: false},
    {id: 3, text: 'Deploy the App', completed: false}
  ];

  addTask(newTask: string) {
    let newIndex = this.todos.length + 1
    let task = {
      id: newIndex,
      text: newTask,
      completed: false
    }
    this.todos.push(task)
  }

  deleteTask(id: any) {
    this.todos = this.todos.filter((task) => task.id != id)
  }

  completeTask(id: any) {
    let task = this.todos.find((task) => task.id == id)
    this.todos = this.todos.filter((task) => task.id != id)
    if (task) {
      task.completed = true;
    }
    if (task) {
      this.todos.push(task)

    }
  }
}
