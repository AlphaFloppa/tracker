import {createRoot} from 'react-dom/client';
import { App } from './components/App/app';

window.addEventListener('DOMContentLoaded', () => {
    const rootContainer = document.getElementById('root');
    if(!rootContainer){
        alert('rootContainer is null');
        return;
    }
    const root = createRoot(rootContainer);
    root.render(
        <App/>
    )
});