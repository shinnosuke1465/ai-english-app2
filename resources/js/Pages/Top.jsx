import { Head } from '@inertiajs/react'
import { SideMenu } from '../Components/SideMenu'

export default function Top({}) {
    return (
        <>
            <Head title="Top" />
            <div className="flex h-screen">
                <SideMenu />
                <div className="flex-1 p-4 bg-gray-800 text-white">
                    <div className="flex justify-end">
                        <button className="bg-gray-300 text-black px-4 py-2 rounded">ログアウト</button>
                    </div>
                    <h1 className="text-2xl mb-4">英会話学習記録</h1>
                    <div className="grid grid-cols-10 gap-1">
                        {Array.from({ length: 100 }).map((_, index) => (
                            <div key={index} className={`w-8 h-8 ${index === 9 || index === 19 ? 'bg-green-500' : 'bg-gray-300'}`}></div>
                        ))}
                    </div>
                </div>
            </div>
        </>
    )
}
