import {Component, EventEmitter, Output} from '@angular/core';

@Component({
  selector: 'app-todo-form',
  imports: [],
  templateUrl: './todo-form.component.html',
  styleUrl: './todo-form.component.css'
})
export class TodoFormComponent {
@Output() sendTaskToParent = new EventEmitter<string>()

  handelAddTask(text: string){
  this.sendTaskToParent.emit(text)
  }
}
