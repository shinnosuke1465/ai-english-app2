import { Head } from '@inertiajs/react'
import { SideMenu } from '../Components/SideMenu'
import { LogoutButton } from '../Components/LogoutButton'
import { LearningRecordGrid } from '../Components/LearningRecordGrid'

export default function Top({ threads, learningDates }) { // learningDatesを受け取る
    return (
        <>
            <Head title="Top" />
            <div className="flex h-screen">
                <SideMenu threads={threads} /> {/* threadsをSideMenuに渡す */}
                <div className="flex-1 p-4 bg-gray-800 text-white">
                    <div className="flex justify-end">
                        <LogoutButton />
                    </div>
                    <h1 className="text-2xl mb-4">英会話学習記録</h1>
                    <LearningRecordGrid learningDates={learningDates} /> {/* learningDatesを渡す */}
                </div>
            </div>
        </>
    )
}
