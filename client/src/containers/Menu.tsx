import React from 'react';
import {FormProvider, SubmitHandler, useForm} from 'react-hook-form';
import FormInput from "../components/Form/FormInput";
import {Button} from "@mui/material";
import FormDatePicker from "../components/Form/FormDatePicker";

interface GetMenuProps {
    data: any [];

}
// eslint-disable-next-line @typescript-eslint/no-explicit-any
const Menu: React.FC<GetMenuProps> = ({data}) => {

    return (
        <div>
            {data.map(m => {
               return <div>{m?.name}</div>
            })}
        </div>
    );
};

export default Menu;