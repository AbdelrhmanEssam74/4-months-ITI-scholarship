import {Component, EventEmitter, Input, Output} from '@angular/core';

@Component({
  selector: 'app-todo-list',
  imports: [],
  templateUrl: './todo-list.component.html',
  styleUrl: './todo-list.component.css'
})
export class TodoListComponent {
  @Input() taskItem: any;
  @Output() deleteTaskFromParent = new EventEmitter<number>()
  handelDeleteTask(id:any){
    this.deleteTaskFromParent.emit(id)
  }
}
