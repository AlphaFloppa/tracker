import { createContext, ReactNode, useContext, useState } from "react";
import type { User } from "@/types/User";

type UserDataContextType = {
    user: User|null,
    setUser: (newUser: User | null) => void
};

const userDataContext = createContext<UserDataContextType | null>(null)

const UserDataProvider = ({children}: {children: ReactNode}) => {
    const [user, setUser] = useState<User|null>(null);
    const content: UserDataContextType = {
        user,
        setUser
    }
    return (
        <userDataContext.Provider value={content}>
            {children}
        </userDataContext.Provider>
    );
}

const useUser = () => {
    const content = useContext(userDataContext);
    if(content === null){
        throw new Error('UserDataContext value is null');
    }

    return content;
}

export {
    UserDataProvider,
    useUser
}