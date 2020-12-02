import { NgModule } from '@angular/core';
import {CommonModule} from '@angular/common';
import { TimeTableComponent } from './time-table.component';
import {HttpClientModule} from '@angular/common/http';
import { TimeTableService } from './time-table.service';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

@NgModule({
    imports: [CommonModule, HttpClientModule, FormsModule,
        ReactiveFormsModule],
    declarations: [TimeTableComponent],
    exports: [TimeTableComponent],
    providers: [TimeTableService], 
})

export class TimeTableModule {

}