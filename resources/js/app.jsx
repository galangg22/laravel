// resources/js/app.jsx
import './bootstrap';
import React from 'react';
import { createRoot } from 'react-dom/client';
// import Home from './components/Home';
import {Home} from './components';

console.log('🚀 React app.jsx loaded');

const mountReactComponents = () => {
    console.log('🔄 Mounting React components...');

    if (!window.reactComponents || !Array.isArray(window.reactComponents)) {
        console.log('❌ No React components found to mount');
        return;
    }

    window.reactComponents.forEach(({ component, props, elementId }) => {
        console.log(`🎯 Attempting to mount: ${component} on #${elementId}`);

        const el = document.getElementById(elementId);
        if (!el) {
            console.error(`❌ Element #${elementId} not found`);
            return;
        }

        const componentsMap = {
            Home: Home,
        };

        const ComponentToRender = componentsMap[component];

        if (!ComponentToRender) {
            console.error(`❌ Component "${component}" not found`);
            return;
        }

        try {
            const root = createRoot(el);
            root.render(React.createElement(ComponentToRender, props));
            console.log(`✅ Successfully mounted ${component}`);
        } catch (error) {
            console.error(`❌ Error mounting ${component}:`, error);
        }
    });
};

// Mount components
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', mountReactComponents);
} else {
    mountReactComponents();
}