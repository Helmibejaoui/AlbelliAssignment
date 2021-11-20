import {ValidUntil} from "./validUntil";

export interface Advertisement {

    id: string
    title: string
    link: string
    validUntil: ValidUntil


}


export interface FormAdvertisement {

    id?:string
    title: string
    link: string
    validUntil: string | Date


}