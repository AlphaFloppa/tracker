import { useNavigate } from "react-router-dom";
import { useUser } from "../../../hooks/UsersStorage.hooks";
import { useEffect } from "react";

type useLoginPropsType = {
    formRef: React.RefObject<HTMLFormElement | null>
}

const useLogin = ({formRef}: useLoginPropsType) => {
    const {setUser} = useUser();
    const navigate = useNavigate();
    const loginHandler = (e: SubmitEvent) => {
        const form = formRef.current;
        if(form === null){
            alert('form is null');
            return;
        }
        e.preventDefault();
        e.stopPropagation();
        const actionURL = form.action;
        const formData = new FormData(form);
        fetch(
            actionURL,
            {
                method: 'POST',
                body: formData
            }
        ).then(
            async (response) => {
                if(!response.ok){
                    alert('server response isnt correct');
                    console.debug(response);
                    return;
                }

                const data = await response.json();
                if(!data.isSuccessful){
                    alert('auth is failed'); 
                    return;
                }
                const {userData} = data;
                alert(userData);
                setUser(userData);
                navigate('/dashboard');
            }
        ).catch(
            () => {
                alert('fetch dumb');
            }
        )
    }    

    useEffect(
        () => {
            formRef.current?.addEventListener(
                'submit',
                loginHandler
           ) 
        },
        []
    );
}

export {
    useLogin
}