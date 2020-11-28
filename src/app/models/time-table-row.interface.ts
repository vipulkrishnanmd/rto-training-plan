export interface TimeTableRow {
    id: number;
    unit_id: number;
    unit_code: string;
    unit_name: string;
    nominal_hours: number;
    core: boolean;
    assessment_methods?: string;
    editing?: boolean;
    order_number?: number;
}