import {Component, EventEmitter, Input, Output} from '@angular/core';

@Component({
  selector: 'app-completed-tasks',
  imports: [],
  templateUrl: './completed-tasks.component.html',
  styleUrl: './completed-tasks.component.css'
})
export class CompletedTasksComponent {
  @Input() taskItem: any;
  @Output() deleteTaskFromParent = new EventEmitter<number>()

  handelDeleteTask(id: any) {
    this.deleteTaskFromParent.emit(id)
  }

}
