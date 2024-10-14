import React from 'react';

export function LearningRecordGrid() {
    return (
        <div className="grid grid-cols-12 gap-2" style={{ width: 'max-content' }}>
            {Array.from({ length: 84 }).map((_, index) => (
                <div
                    key={index}
                    className={`w-8 h-8 ${index === 9 || index === 19 ? 'bg-green-500' : 'bg-gray-300'}`}
                    style={{ width: '32px', height: '32px' }}
                ></div>
            ))}
        </div>
    );
}
