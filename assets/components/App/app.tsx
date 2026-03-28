import { UserDataProvider } from "../../hooks/UsersStorage.hooks";
import { Dashboard } from "../Dashboard/Dashboard";
import { SignPage } from "../SignPage/SignPage";
import { BrowserRouter, Route, Routes, Link } from "react-router-dom";

const App = () => {
    return (
        <UserDataProvider>
            <BrowserRouter>
                <Routes>
                    <Route path = '/sign' element = {<SignPage />} />
                    <Route path = '/dashboard' element = {<Dashboard/>} />
                </Routes>

                <nav>
                    <Link to='/sign'>Sign</Link>
                </nav>
            </BrowserRouter>
        </UserDataProvider>
    );
}

export {
    App
}