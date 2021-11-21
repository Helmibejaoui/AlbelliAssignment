import { RegisterOptions } from 'react-hook-form';
import errorMessages, { IValidator } from './errorMessages';
import { isDate, isValid } from 'date-fns';


interface IValidatorParams {
    validation: IValidator;
}
const testRegex = (value: string, regex: RegExp) =>
    value === '' || (value && value.toString().match(regex) !== null);
const _Validators = {
    required: (val: string | unknown[]) => {
        if (val instanceof Array) {
            return val.length !== 0 ? undefined : errorMessages.required;
        }

        return val ? undefined : errorMessages.required;
    },
    date: (date: string) => (isDate(date) && isValid(date) ? undefined : errorMessages.date),
    link:(value: string)=>(testRegex(value, /^(https?|ftp):\/\/(-\.)?([^\s/?\.#-]+\.?)+(\/[^\s]*)?$/i)
        ? undefined
        : errorMessages.link),
};

const Validators = (params: IValidatorParams[]): RegisterOptions => {
    let validators: RegisterOptions['validate'] = {};

    params.forEach((o) => {
        const { validation } = o;

        switch (validation) {
            default:
                validators = {
                    ...validators,
                    [validation]: _Validators[validation],
                };
                break;
        }
    });

    return { validate: validators };
};

export default Validators;