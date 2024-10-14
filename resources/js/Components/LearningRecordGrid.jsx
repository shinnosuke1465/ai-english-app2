import React from 'react';
import { format, subWeeks, eachDayOfInterval, startOfWeek, endOfWeek } from 'date-fns';

export function LearningRecordGrid({ learningDates }) {
    const today = new Date();
    const startDate = subWeeks(today, 11); // 12週間分のデータを表示
    const days = eachDayOfInterval({ start: startOfWeek(startDate), end: endOfWeek(today) });

    return (
        <div className="grid grid-rows-7 grid-flow-col gap-2" style={{ width: 'max-content' }}>
            {days.map((day, index) => {
                const dayString = format(day, 'yyyy-MM-dd');
                const isLearningDay = learningDates.includes(dayString);
                return (
                    <div
                        key={index}
                        className={`w-8 h-8 ${isLearningDay ? 'bg-green-500' : 'bg-gray-300'}`}
                        style={{ width: '32px', height: '32px' }}
                    ></div>
                );
            })}
        </div>
    );
}
