export default {
    required: 'Field is required.',
    date: 'The field should be dd/mm/yyyy',
    link: 'The field should be a link',

};
export type IValidator = 'required' | 'date' | 'link';