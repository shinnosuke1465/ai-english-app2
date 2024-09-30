import { Head } from '@inertiajs/react'
import { SideMenu } from '../../Components/SideMenu'
import { LogoutButton } from '../../Components/LogoutButton'

export default function Show({}) {
    return (
        <>
            <Head title="Show" />
            <div className="flex h-screen">
                <SideMenu />
                <div className="flex-1 p-4 bg-gray-800 text-white">
                    <div className="flex justify-end">
                        <LogoutButton />
                    </div>
                    <h1 className="text-2xl mb-4">英会話画面</h1>
                </div>
            </div>
        </>
    )
}
